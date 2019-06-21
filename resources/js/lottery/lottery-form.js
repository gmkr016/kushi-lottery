// const actions = require('./lottery-actions');

const generateBtn = document.querySelector('#generateBtn');
const input = {
    first: document.querySelector('#lottery1'),
    second: document.querySelector('#lottery2'),
    third: document.querySelector('#lottery3'),
    fourth: document.querySelector('#lottery4'),
    fifth: document.querySelector('#lottery5'),
    sixth: document.querySelector('#lottery6'),
    lott_cat: document.querySelector('#lott_cat'),



};

generateBtn.onclick = () => {
    generateBtn.setAttribute('disabled', 'disabled');
    // request to server about the numbers
    window.axios.get('generate').then((response) => {
        let data = response.data;
        show('#randomNumbers');
        input.first.value = data.first;
        input.second.value = data.second;
        input.third.value = data.third;
        input.fourth.value = data.fourth;
        input.fifth.value = data.fifth;
        input.sixth.value = data.sixth;

        generateBtn.removeAttribute('disabled');
    }, (errors) => {
        console.log(errors);
        generateBtn.removeAttribute('disabled');

        window.swal(errors.response.data.message);
    });
}

const confirmBtn = document.querySelector('#confirmBtn');

confirmBtn.onclick = () => {
    let formData = {
        first: input.first.value,
        second: input.second.value,
        third: input.third.value,
        fourth: input.fourth.value,
        fifth: input.fifth.value,
        sixth: input.sixth.value,
        lott_cat: input.lott_cat.value,
    };

    confirmBtn.setAttribute('disabled', 'disabled');
    window.axios.post('submit', formData).then((response) => {
        let data = response.data;
        confirmBtn.removeAttribute('disabled');
        window.swal.fire({
            position: 'top-end',
            title: 'Success',
            text: data.message,
            type: 'success'
        });
    }, (errors) => {
        confirmBtn.removeAttribute('disabled');
        window.swal.fire(errors.response.data.message);
    });
}

show = (element) => {
    // remove d-none class (Bootstrap 4)
    document.querySelector(element).classList.remove('d-none');
}

replaceInputValue = (element, newValue) => {
    document.querySelector(element).value = newValue;
}