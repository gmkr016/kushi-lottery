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
