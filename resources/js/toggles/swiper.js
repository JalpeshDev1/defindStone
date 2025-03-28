// Swiper Slider
import Swiper, { Navigation, Pagination, EffectFade } from 'swiper';
import 'swiper/css';

const swiper = () => {

    const heroSlider = document.querySelectorAll('.hero-slider');

    heroSlider.forEach(slider => {
        // console.log(slider);
        const heroSlider = new Swiper(slider, {
            // Optional parameters
            modules: [Navigation, Pagination],
            loop: true,
            slidesPerView: 1,
            spaceBetween: 16,
            //centeredSlides: true,
            centeredSlidesBounds: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            // // Navigation arrows
            navigation: {
                nextEl: slider.querySelector('.swiper-button-slide-next'),
                prevEl: slider.querySelector('.swiper-button-slide-prev'),
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
        });
    })

    window.mySwiperInstances = [];

    const sliders = document.querySelectorAll('.project-slider');
    if (sliders.length) {
        sliders.forEach(slider => {
            const nextEl = slider.querySelector('.swiper-button-slide-next');
            const prevEl = slider.querySelector('.swiper-button-slide-prev');
            const paginationEl = slider.querySelector('.swiper-pagination');

            const swiperInstance = new Swiper(slider, {
                modules: [Navigation, Pagination],
                loop: false,
                slidesPerView: 1,
                spaceBetween: 16,
                //centeredSlidesBounds: true,
                navigation: {
                    nextEl: nextEl || null,
                    prevEl: prevEl || null,
                },
                pagination: {
                    el: paginationEl || '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    820: { slidesPerView: 1 },
                    1200: { slidesPerView: 2 },
                    1921: { slidesPerView: 3 },
                },
            });

            window.mySwiperInstances.push(swiperInstance);
        });
    }

    // Set up filtering for sectors
    const filterButtons = document.querySelectorAll('.sector-filter');
    if (filterButtons.length) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const selectedSector = btn.dataset.sector;

                const allSlides = document.querySelectorAll('.project-slider .swiper-slide');
                allSlides.forEach(slide => {
                    const slideSector = slide.dataset.sector;
                    if (selectedSector === 'all' || slideSector === selectedSector) {
                        slide.style.display = 'block';
                    } else {
                        slide.style.display = 'none';
                    }
                });

                if (window.mySwiperInstances.length) {
                    window.mySwiperInstances.forEach(swiperInstance => {
                        swiperInstance.update();
                        swiperInstance.slideTo(0);
                    });
                }
            });
        });
    }

    const projSliders = document.querySelectorAll('.project-slider-alt');

    projSliders.forEach(slider => {
        // console.log(slider);
        const cardSlider = new Swiper(slider, {
            modules: [Navigation, Pagination],
            loop: true,
            slidesPerView: 1,
            centeredSlidesBounds: true,

            navigation: {
                nextEl: slider.querySelector('.swiper-button-slide-next'),
                prevEl: slider.querySelector('.swiper-button-slide-prev'),
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
        });
    })

    const productSlider = document.querySelectorAll('.product-slider');

    productSlider.forEach(slider => {
        const cardSlider = new Swiper(slider, {
            modules: [Navigation, Pagination, EffectFade],
            loop: true,
            slidesPerView: 1,
            spaceBetween: 32,
            crossFade: true,

            navigation: {
                nextEl: slider.querySelector('.swiper-button-slide-next'),
                prevEl: slider.querySelector('.swiper-button-slide-prev'),
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

            breakpoints: {
                820: {
                    slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 4,
                },
                1921: {
                    slidesPerView: 4,
                },
            },
        });
    })

    const revSliders = document.querySelectorAll('.reviews-slider');

    revSliders.forEach(revSlider => {
        // console.log(slider);
        const cardSlider = new Swiper(revSlider, {
            // Optional parameters
            modules: [Navigation, Pagination, EffectFade],
            loop: true,
            //effect: "fade",
            slidesPerView: 1,
            spaceBetween: 40,
            crossFade: true,


            // // Navigation arrows
            navigation: {
                nextEl: revSlider.querySelector('.swiper-button-slide-next'),
                prevEl: revSlider.querySelector('.swiper-button-slide-prev'),
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

            breakpoints: {
                820: {
                    slidesPerView: 1.5,
                },
                1200: {
                    slidesPerView: 2.5,
                },
                1921: {
                    slidesPerView: 2.5,
                },
            },
        });
    });

    const productCase = document.querySelectorAll('.product-case-slider');

    productCase.forEach(productCase => {
        // console.log(slider);
        const cardSlider = new Swiper(productCase, {
            // Optional parameters
            modules: [Navigation, Pagination, EffectFade],
            loop: true,
            //effect: "fade",
            slidesPerView: 1,
            spaceBetween: 45,
            crossFade: true,


            // // Navigation arrows
            navigation: {
                nextEl: productCase.querySelector('.swiper-button-slide-next'),
                prevEl: productCase.querySelector('.swiper-button-slide-prev'),
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

            breakpoints: {
                820: {
                    slidesPerView: 1.5,
                },
                1200: {
                    slidesPerView: 1.5,
                },
                1921: {
                    slidesPerView: 2.5,
                },
            },
        });
    })

}


export default swiper