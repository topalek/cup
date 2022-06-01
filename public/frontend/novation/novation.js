var scene = document.getElementById('nova-slider__scene');

var counterX = document.getElementById('clientX');
var counterY = document.getElementById('clientY');

var ns1 = scene.querySelector('#ns1');
var ns2 = scene.querySelector('#ns2');
var ns3 = scene.querySelector('#ns3');

var objects = [
    // 0
    {
        title: 'Эстетичность',
        text: 'С другой стороны рамки и место обучения кадров играет важную роль в формировании дальнейших направлений развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности требуют от нас анализа направлений прогрессивного развития.',
        img: 'slide1.png'
    },
    // 1
    {
        title: 'Практичность',
        text: 'С другой стороны рамки и место обучения кадров играет важную роль в формировании дальнейших направлений развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности требуют от нас анализа направлений прогрессивного развития.',
        img: 'slide1.png'
    },
    // 2
    {
        title: 'Грация',
        text: 'С другой стороны рамки и место обучения кадров играет важную роль в формировании дальнейших направлений развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности требуют от нас анализа направлений прогрессивного развития.',
        img: 'slide1.png'
    }
];

var vari = document.getElementById('var');


var ts;
var scroll = false;
var next;

scene.addEventListener('touchstart', function(e){
    ts = e.touches[0].clientY;
})
scene.addEventListener('touchend', function(e){
    var te = e.changedTouches[0].clientY;

    if(ts > te+5){
        scroll = true;
        changeSlide(0);
    }else if(ts < te -5 ){
        scroll = true;
        changeSlide(1);
    }
})

// var temp = window.onscroll;

// window.onscroll = function () { window.scrollTo(0, 0); };

// setTimeout(function(){
//     window.onscroll = temp;
// },5000)
// window.addEventListener('scroll', function(e){
//     if(scene.getBoundingClientRect().top < 150){
        
//     }
// })

scene.addEventListener('wheel', function(e){
    if(scroll == false){
        if(e.deltaY > 0){
            scroll = true;
            changeSlide(0);
        }else{
            scroll = true;
            changeSlide(1);
        }
    }
})

scene.addEventListener('mousemove', function(e){
    ns1.style.transition = "all .6s ease";
    ns3.style.transition = "all .3s ease";
    transformElement(ns1, e.clientX/550, e.clientY/550);
    transformElement(ns3, e.clientX/250,e.clientY/250);
})

scene.addEventListener('mouseleave', function(e){
    ns1.style.transition = "all 1.6s ease";
    ns2.style.transition = "all 1.6s ease";
    ns3.style.transition = "all 1.3s ease";
    ns1.style.transform = "none";
    ns3.style.transform = "none";
})

function changeSlide(direction){
    var current = parseInt(scene.getAttribute('data-current'));
    if(direction === 0){
        next = current === objects.length-1 ? 0 : current + 1;
    }else{
        next = current === 0 ? objects.length-1 : current - 1;
    }

    scene.setAttribute('data-current',next);

    ns1.style.opacity = "0";
    ns2.style.opacity = "0";
    ns3.style.opacity = "0";

    setTimeout(function(){
        ns1.innerHTML = objects[next].title;
        ns2.innerHTML = objects[next].text;
    },500);

    setTimeout(function(){
        ns1.style.opacity = "1";
        ns2.style.opacity = "1";
        ns3.style.opacity = "1";
    },500)

    setTimeout(function(){
        scroll = false;
    },1000)
}

function transformElement(el, x, y){
    el.style.transform = "translate3D("+x+"%, "+y+"%, 0)";
}



/** DISABLING SCROLL */
// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}


