var scene = document.getElementById('nova-slider__scene');

var counterX = document.getElementById('clientX');
var counterY = document.getElementById('clientY');



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


var next;

var ns1 = scene.querySelector('#ns1');
var ns2 = scene.querySelector('#ns2');
var ns3 = scene.querySelector('#ns3-m');
var ns3a = scene.querySelector('#ns3');
var ns31 = scene.querySelector('#ns3-1');
var ns32 = scene.querySelector('#ns3-2');
var ns33 = scene.querySelector('#ns3-3');

scene.addEventListener('mousemove', function (e) {
    ns1.style.transition = "all .6s ease";
    ns3.style.transition = "all .3s ease";
    ns31.style.transition = "all .3s ease";
    ns3a.style.transition = "all .3s ease";
    ns32.style.transition = "all .3s ease";
    ns33.style.transition = "all .3s ease";
    transformElement(ns1, e.clientX / 550, e.clientY / 550);

    transformElement(ns3, e.clientX / 250, e.clientY / 250);
    transformElement(ns31, e.clientX / 350, e.clientY / 250);
    transformElement(ns32, e.clientX / 450, e.clientY / 250);
    transformElement(ns33, e.clientX / 550, e.clientY / 250);
})

scene.addEventListener('mouseleave', function (e) {
    ns1.style.transition = "all 1.6s ease";
    ns2.style.transition = "all 1.6s ease";
    ns3.style.transition = "all 1.3s ease";
    ns3a.style.transition = "all 1.3s ease";
    ns31.style.transition = "all 1.3s ease";
    ns32.style.transition = "all 1.3s ease";
    ns33.style.transition = "all 1.3s ease";
    ns1.style.transform = "none";
    ns3.style.transform = "none";
    ns31.style.transform = "none";
    ns32.style.transform = "none";
    ns33.style.transform = "none";
})

function changeSlide(direction) {
    var current = parseInt(scene.getAttribute('data-current'));

    if (direction === 0) {
        next = current === objects.length - 1 ? 0 : current + 1;
    } else {
        next = current === 0 ? objects.length - 1 : current - 1;
    }

    scene.setAttribute('data-current', next);

    ns1.style.opacity = "0";
    ns2.style.opacity = "0";
    ns3.style.opacity = "0";
    ns3a.style.opacity = "0";

    setTimeout(function () {
        ns1.innerHTML = objects[next].title;
        ns2.innerHTML = objects[next].text;
    }, 500);

    setTimeout(function () {
        ns1.style.opacity = "1";
        ns2.style.opacity = "1";
        ns3.style.opacity = "1";
        ns3a.style.opacity = "1";

    }, 500)
}

function transformElement(el, x, y) {
    el.style.transform = "translate3D(" + x + "%, " + y + "%, 0)";
}

$('.nova__next').on('click', ()=>{
    changeSlide(0);
})
$('.nova__prev').on('click', ()=>{
    changeSlide(1);
})