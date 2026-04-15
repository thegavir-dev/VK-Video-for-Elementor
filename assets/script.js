document.addEventListener('click',function(e){
 const el=e.target.closest('.vk-video-lazy');
 if(!el||el.classList.contains('loaded'))return;
 const iframe=document.createElement('iframe');
 iframe.src=el.dataset.src;
 iframe.allow='autoplay';
 iframe.allowFullscreen=true;
 el.innerHTML='';
 el.appendChild(iframe);
 el.classList.add('loaded');
});
