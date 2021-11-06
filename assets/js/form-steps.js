let step = $('.step');
let prevBtn = $('#prev-btn');
let nextBtn = $('#next-btn');
let submitBtn = $('#submit-btn');
let form = $('#form-wrapper');
let preloader = $('#preloader-wrapper');
let bodyElement = $('body');
let succcessDiv = $('#success');

let current_step = 0;
let stepCount = step.length-1
step[current_step].classList.add('d-block');
if (current_step == 0) {
    prevBtn.addClass('d-none');
    submitBtn.addClass('d-none');
    nextBtn.addClass('d-inline-block');
}
const progress = (value) => {
    document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
}

nextBtn.on('click', () => {
    current_step++;
    let previous_step = current_step - 1;
    if ((current_step > 0) && (current_step <= stepCount)) {
        prevBtn.removeClass('d-none');
        prevBtn.addClass('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block');
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step == stepCount) {
            submitBtn.removeClass('d-none');
            submitBtn.addClass('d-inline-block');
            nextBtn.removeClass('d-inline-block');
            nextBtn.addClass('d-none');
        }
    } else {
        if (current_step > stepCount) {
            form.onsubmit = () => {
                alert('Berhasil')
            }
        }
    }
    progress((100 / stepCount) * current_step);
});


prevBtn.on('click', () => {
    if (current_step > 0) {
        current_step--;
        let previous_step = current_step + 1;
        prevBtn.addClass('d-none');
        prevBtn.addClass('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block')
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step < stepCount) {
            submitBtn.removeClass('d-inline-block');
            submitBtn.addClass('d-none');
            nextBtn.removeClass('d-none');
            nextBtn.addClass('d-inline-block');
            prevBtn.removeClass('d-none');
            prevBtn.addClass('d-inline-block');
        }
    }

    if (current_step == 0) {
        prevBtn.removeClass('d-inline-block');
        prevBtn.addClass('d-none');
    }
    progress((100 / stepCount) * current_step);
});