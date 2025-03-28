const onboardingForm = () => {

    const slides = document.querySelectorAll('.form-slide');
    const slidesContainer = document.querySelector('.slides-container-wrapper');
    let currentSlide = 0;
    const progressBar = document.querySelector('.progress-bar');
    let progressValue = 50; // Starting value
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');


    const headings = [
        "2. About your fleet",
        "3. About your business",
    ];

    function updateHeading() {
        const headingElement = document.getElementById('slideHeading');
        headingElement.textContent = headings[currentSlide];
    }


    if (nextBtn) {
        document.getElementById('nextBtn').addEventListener('click', function () {
            slides[currentSlide].classList.add('touched'); // Mark slide as touched
            if (validateSlide(slides[currentSlide])) {
                if (currentSlide === 1) {  // Check if it's the second slide
                    sendEmail();  // Call the email sending function
                    currentSlide++;
                    updateSlides();
                    progressValue += 50 / (slides.length - 1);
                    progressBar.style.width = progressValue + '%';
                }
                if (currentSlide < slides.length - 1) {
                    currentSlide++;
                    updateSlides();
                    progressValue += 50 / (slides.length - 1);
                    progressBar.style.width = progressValue + '%';
                }
            }

            // Check if we're on the last slide
            if (currentSlide === slides.length - 1) {
                nextBtn.style.display = 'none'; // Hide the next button
            } else {
                nextBtn.style.display = 'block'; // Just in case, show the next button
            }

            updateHeading();
        });
    }

    if (prevBtn) {
        document.getElementById('prevBtn').addEventListener('click', function () {
            if (currentSlide > 0) { // Ensure not to go back beyond the first slide
                currentSlide--;
                updateSlides();
                progressValue -= 50 / (slides.length - 1); // Update progress based on slides
                progressBar.style.width = progressValue + '%';
            }
            nextBtn.style.display = 'block';
            updateHeading();
        });

    }

    function validateSlide(slide) {
        let isValid = true;
        const inputs = slide.querySelectorAll('input[required]');
        inputs.forEach(input => {
            const errorMessage = input.parentElement.querySelector('.error-message');

            if (!errorMessage) {
                console.log("No error message element found for input", input);
                return; // Skip this input and log an error
            } else {
                if (input.type === "checkbox" && !input.checked) { // Check if it's a checkbox and if it's not checked
                    isValid = false;
                    errorMessage.style.display = 'block'; // Show the error message
                } else if (!input.checkValidity()) {
                    isValid = false;
                    errorMessage.style.display = 'block'; // Show the error message
                } else {
                    errorMessage.style.display = 'none'; // Hide the error message
                }
            }
        });
        return isValid;
    }

    function updateSlides() {
        const offset = -currentSlide * 100;
        slidesContainer.style.transform = `translateX(${offset}%)`;
    }

    function sendEmail() {

        const form = document.getElementById('onboarding-form');
        const ajaxurl = document.querySelector('[data-ajax-url]').getAttribute('data-ajax-url')

        console.log(sessionStorage.getItem('mailSent'));
        //Add session value to a variable
        if(sessionStorage.getItem('mailSent') === 'True') {
            return;
        }

        // Make the AJAX call
        // Make the AJAX call
        fetch(ajaxurl, {
            method: 'POST',
            body: new FormData(form)
        })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                    sessionStorage.setItem("mailSent", "True");
            })
            .catch(error => {
                //console.error("There was an error sending the email:", error);
                console.log(error);
            });

        /**
         * EVENT TRACKING
         */
        var callback = function () {
            if (typeof (url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-11395517134/UCipCPb_nPMYEM6V57kq',
            'event_callback': callback
        });


    }


}


export default onboardingForm