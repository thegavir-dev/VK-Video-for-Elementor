# VK Video for Elementor

WordPress plugin that adds a VK Video widget for Elementor.

Плагин WordPress, который добавляет виджет VK Video для Elementor.

## Features

- Embed VK Video by link
- Support for pasted `iframe` embed code
- Aspect ratio selection: `16:9` and `4:3`
- Border, shadow, and border radius styling via Elementor
- Immediate preview in the Elementor editor
- Lazy video loading on the frontend after click

## Возможности

- Вставка VK Video по ссылке
- Поддержка готового `iframe` кода
- Выбор соотношения сторон: `16:9` и `4:3`
- Настройка границы, тени и скругления через Elementor
- Мгновенный предпросмотр в редакторе Elementor
- Ленивый запуск видео на фронтенде после клика

## Requirements

- WordPress
- Elementor

## Требования

- WordPress
- Elementor

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin in the WordPress admin panel
3. Make sure Elementor is installed and activated

## Установка

1. Загрузите папку плагина в `/wp-content/plugins/`
2. Активируйте плагин в админке WordPress
3. Убедитесь, что Elementor установлен и активирован

## Usage

1. Open a page in Elementor
2. Find the `VK Video PRO` widget
3. Drag it onto the page
4. Paste one of the following into the widget field:
   - a VK video URL
   - a full `iframe` embed code
5. Choose the desired aspect ratio

## Использование

1. Откройте страницу в Elementor
2. Найдите виджет `VK Video PRO`
3. Перетащите его на страницу
4. Вставьте в поле виджета:
   - ссылку на видео VK
   - или полный `iframe` код
5. Выберите нужное соотношение сторон

## Supported Input Formats

### VK Video URL

```text
https://vk.com/video-123456_789012
```

### iframe Embed Code

```html
<iframe src="https://vkvideo.ru/video_ext.php?oid=-123456&id=789012" frameborder="0" allowfullscreen></iframe>
```

## Поддерживаемые форматы

### Ссылка на VK Video

```text
https://vk.com/video-123456_789012
```

### iframe код

```html
<iframe src="https://vkvideo.ru/video_ext.php?oid=-123456&id=789012" frameborder="0" allowfullscreen></iframe>
```

## Widget Settings

### Content

- `Link or iframe` input
- `Aspect Ratio`: `16:9` or `4:3`

### Style

- Border
- Box shadow
- Border radius

## Настройки виджета

### Контент

- `Link or iframe`
- `Aspect Ratio`: `16:9` или `4:3`

### Стиль

- Граница
- Тень
- Скругление углов

## How It Works

- In the Elementor editor, the video iframe is rendered immediately for live preview
- On the frontend, the iframe is created only after the visitor clicks the placeholder

## Как это работает

- В редакторе Elementor `iframe` отображается сразу для удобного предпросмотра
- На фронтенде `iframe` создается только после клика по заглушке

## Plugin Structure

```text
vk-video-elementor/
├── vk-video-elementor.php
├── widgets/
│   └── vk-video-widget.php
└── assets/
    ├── script.js
    └── style.css
```

## Version

Current version: `1.4.3`

## Версия

Текущая версия: `1.4.3`

## Author

StudioAVP

## Автор

StudioAVP

## License

If you plan to distribute the plugin publicly, add your preferred license here, for example `GPL-2.0-or-later`.

## Лицензия

Если планируете публично распространять плагин, укажите лицензию, например `GPL-2.0-or-later`.
