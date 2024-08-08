document.addEventListener('mousemove', function(e) {
    var mouseEffect = document.getElementById('mouseEffect');
    mouseEffect.style.left = e.pageX + 'px';
    mouseEffect.style.top = e.pageY + 'px';
    mouseEffect.style.transform = 'translate(-50%, -50%) scale(1)';
    clearTimeout(mouseEffect.timeout);
    mouseEffect.timeout = setTimeout(function() {
        mouseEffect.style.transform = 'translate(-50%, -50%) scale(0)';
    }, 300);
});
س