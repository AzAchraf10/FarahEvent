document.addEventListener('DOMContentLoaded', function() {
    // ===== FAQ FUNCTIONALITY =====
    const faqItems = document.querySelectorAll('.faq-item');
   
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
       
        question.addEventListener('click', function() {
            // Close all other FAQ items first
            faqItems.forEach(otherItem => {
                if(otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
           
            // Toggle current item
            item.classList.toggle('active');
        });
    });
    
    // ===== TESTIMONIAL SLIDER FUNCTIONALITY =====
    const testimonials = document.querySelectorAll('.testo');
    const controlDots = document.querySelectorAll('.control-dot');
    let currentIndex = 0;
    
    // Initialize the slider
    initializeSlider();
    
    function initializeSlider() {
        // Set active state for first testimonial and dot
        testimonials[0].style.opacity = '1';
        testimonials[0].style.transform = 'translateX(0)';
        testimonials[0].style.position = 'relative';
        testimonials[0].style.pointerEvents = 'all';
        controlDots[0].classList.add('active');
        
        // Add click events to control dots
        controlDots.forEach(dot => {
            dot.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                showTestimonial(index);
            });
        });
        
        // Set up autoplay
        setInterval(() => {
            let nextIndex = currentIndex + 1;
            if (nextIndex >= testimonials.length) {
                nextIndex = 0;
            }
            showTestimonial(nextIndex);
        }, 6000); // Change testimonial every 6 seconds
    }
    
    function showTestimonial(index) {
        if (index === currentIndex) return;
        
        // Hide current testimonial
        testimonials[currentIndex].style.opacity = '0';
        testimonials[currentIndex].style.transform = index > currentIndex ? 'translateX(-100%)' : 'translateX(100%)';
        testimonials[currentIndex].style.pointerEvents = 'none';
        controlDots[currentIndex].classList.remove('active');
        
        // Show new testimonial
        setTimeout(() => {
            testimonials[currentIndex].style.position = 'absolute';
            testimonials[index].style.position = 'relative';
            testimonials[index].style.opacity = '1';
            testimonials[index].style.transform = 'translateX(0)';
            testimonials[index].style.pointerEvents = 'all';
            controlDots[index].classList.add('active');
            
            currentIndex = index;
        }, 300);
    }
    
    // ===== TOUCH/SWIPE FUNCTIONALITY =====
    const slider = document.querySelector('.test-left');
    let touchStartX = 0;
    let touchEndX = 0;
    
    // Touch events for mobile
    slider.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});
    
    slider.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});
    
    function handleSwipe() {
        const swipeThreshold = 50;
        
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swiped left - next testimonial
            let nextIndex = currentIndex + 1;
            if (nextIndex >= testimonials.length) {
                nextIndex = 0;
            }
            showTestimonial(nextIndex);
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swiped right - previous testimonial
            let prevIndex = currentIndex - 1;
            if (prevIndex < 0) {
                prevIndex = testimonials.length - 1;
            }
            showTestimonial(prevIndex);
        }
    }
    
    // Mouse drag support for desktop
    let isDragging = false;
    let startPosX = 0;
    
    slider.addEventListener('mousedown', (e) => {
        isDragging = true;
        startPosX = e.clientX;
        slider.style.cursor = 'grabbing';
        e.preventDefault();
    });
    
    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
    });
    
    document.addEventListener('mouseup', (e) => {
        if (!isDragging) return;
        
        const currentPosition = e.clientX;
        const diff = currentPosition - startPosX;
        const swipeThreshold = 50;
        
        if (diff > swipeThreshold) {
            // Swiped right - previous testimonial
            let prevIndex = currentIndex - 1;
            if (prevIndex < 0) {
                prevIndex = testimonials.length - 1;
            }
            showTestimonial(prevIndex);
        } else if (diff < -swipeThreshold) {
            // Swiped left - next testimonial
            let nextIndex = currentIndex + 1;
            if (nextIndex >= testimonials.length) {
                nextIndex = 0;
            }
            showTestimonial(nextIndex);
        }
        
        isDragging = false;
        slider.style.cursor = '';
    });
    
    document.addEventListener('mouseleave', () => {
        isDragging = false;
        slider.style.cursor = '';
    });
    
    // Make images lazy loading for better performance
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            img.setAttribute('loading', 'lazy');
        });
    });
});