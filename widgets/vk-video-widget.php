<?php
if (!defined('ABSPATH')) exit;

class VK_Video_Widget extends \Elementor\Widget_Base {

    public function get_name() { return 'vk_video'; }
    public function get_title() { return 'VK Video PRO'; }
    public function get_icon() { return 'eicon-video-camera'; }
    public function get_categories() { return ['general']; }
    public function get_style_depends() { return ['vk-video-style']; }
    public function get_script_depends() { return ['vk-video-script']; }

    protected function register_controls() {

        // Content
        $this->start_controls_section('content_section', ['label' => 'Контент']);

        $this->add_control('video_url', [
            'label' => 'Ссылка или iframe',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('aspect_ratio', [
            'label' => 'Соотношение сторон',
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => ['16:9'=>'16:9','4:3'=>'4:3'],
            'default' => '16:9'
        ]);

        $this->end_controls_section();

        // Style
        $this->start_controls_section('style_section', [
            'label' => 'Контейнер',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'border',
            'selector' => '{{WRAPPER}} .vk-video-wrapper',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'selector' => '{{WRAPPER}} .vk-video-wrapper',
        ]);

        $this->add_control('radius', [
            'label' => 'Скругление',
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .vk-video-wrapper' => 'border-radius: {{SIZE}}px; overflow:hidden;'
            ]
        ]);

        $this->end_controls_section();
    }

    private function parse_embed($url) {
        if (strpos($url, '<iframe') !== false) return $url;
        if (preg_match('/video(-?\d+)_(\d+)/', $url, $m)) {
            return "https://vkvideo.ru/video_ext.php?oid={$m[1]}&id={$m[2]}";
        }
        return false;
    }

    protected function render() {
        $url = $this->get_settings_for_display('video_url');
        $ratio = ($this->get_settings_for_display('aspect_ratio')==='4:3')?'75%':'56.25%';

        if (!$url) { echo '<div>Вставьте ссылку</div>'; return; }

        $embed = $this->parse_embed($url);
        if (!$embed) { echo '<div>Некорректная ссылка</div>'; return; }

        echo '<div class="vk-video-wrapper" style="padding-bottom:'.$ratio.'">';

        // In editor: render iframe immediately (no lazy)
        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            if (strpos($embed, '<iframe') !== false) {
                echo $embed;
            } else {
                echo '<iframe src="'.esc_url($embed).'" frameborder="0" allowfullscreen></iframe>';
            }
        } else {
            // Frontend lazy
            echo '<div class="vk-video-lazy" data-src="'.esc_url($embed).'">';
            echo '<div class="vk-fallback-bg"></div>';
            echo '<div class="vk-play"></div>';
            echo '</div>';
        }

        echo '</div>';
    }

    protected function _content_template() {
        ?>
        <#
        var url = settings.video_url;
        var ratio = settings.aspect_ratio === '4:3' ? '75%' : '56.25%';

        if (!url) { #>
            <div>Вставьте ссылку</div>
        <# return; }

        var isIframe = url.includes('<iframe');
        var match = url.match(/video(-?\d+)_(\d+)/);
        #>

        <div class="vk-video-wrapper" style="padding-bottom: {{ ratio }}">
            <# if (isIframe) { #>
                {{{ url }}}
            <# } else if (match) {
                var embed = "https://vkvideo.ru/video_ext.php?oid=" + match[1] + "&id=" + match[2];
            #>
                <iframe src="{{ embed }}" frameborder="0" allowfullscreen></iframe>
            <# } else { #>
                <div>Некорректная ссылка</div>
            <# } #>
        </div>
        <?php
    }
}
