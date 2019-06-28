// constructor starts
$(function() {
    var count = 1;
    var price = 100;
    $("a.lotteryBuyMore").click(function(e) {
        price = price + 100;
        // var count = e.target.id; // first comes three
        // $(this).attr('id', count);
        count++;
        if (count > 9) {
            $("a.lotteryBuyMore").off();

        }
        $("div.lotteryListHolder").append(
            $("<form/>").attr({
                action: '',
                class: 'lotteryNumber',
                id: 'f' + count,
                name: 'f' + count

            }).append(
                // first div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery1',
                        class: 'form-control',
                    })
                ),
                //second div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery2',
                        class: 'form-control'
                    })
                ),
                // third div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery3',
                        class: 'form-control'
                    })
                ),
                // fourth div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery4',
                        class: 'form-control'
                    })
                ),
                // fifth div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery5',
                        class: 'form-control'
                    })
                ),
                // sixth div
                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'text',
                        name: 'lottery6',
                        class: 'form-control'
                    })
                ),
                // quick pick div

                $("<div/>", {
                    class: 'form-group'
                }).append(
                    $("<input/>").attr({
                        type: 'button',
                        onclick: 'myFunction(this)',
                        id: '4',
                        class: 'btn btn-info'
                        value: 'Quick Pick'
                    })
                )
            )
        )
        $("div.lotteryTicketPriceTag").html("<span>Rs</span>" + price);
        // console.log(price);
    });


    // check if category select option has selected or not and send generated number to modal function
    $("a.printTicket").click(function() {

        var datas = [];
        // var sss;
        $("div#numberdiv").html("");
        var selected_option = $('#selectCategory option:selected').val();
        if (selected_option < 1) {
            alert("Please select category");
        } else {
            var formsCollection = document.getElementsByClassName("lotteryNumber");
            var ssss = 0;
            for (var i = 0; i < formsCollection.length; i++) {

                let elements1Value = formsCollection[i].elements.lottery1.value;
                let elements2Value = formsCollection[i].elements.lottery2.value;
                let elements3Value = formsCollection[i].elements.lottery3.value;
                let elements4Value = formsCollection[i].elements.lottery4.value;
                let elements5Value = formsCollection[i].elements.lottery5.value;
                let elements6Value = formsCollection[i].elements.lottery6.value;
                // console.log(elements1Value + " " + elements2Value + " " + elements3Value + " " + elements4Value + " " + elements5Value + " " + elements6Value);
                var formData = {
                    'lott_cat': selected_option,
                    'first': elements1Value,
                    'second': elements2Value,
                    'third': elements3Value,
                    'fourth': elements4Value,
                    'fifth': elements5Value,
                    'sixth': elements6Value,

                };
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: "POST",
                    url: 'user/submit',
                    data: formData,
                    success: function(response) {
                        ssss++;
                        // console.log(response);
                        var rajesh = response.message.original.msg;
                        $("div#numberdiv").append("<ul class='numberul" + ssss + "'></ul>")
                        $.each(rajesh, function(k, v) {
                            $("ul.numberul" + ssss).append(
                                "<li>" + v + "</li>"
                            )
                        });
                        return true;
                    },
                    error: function(response) {
                        alert("you are not logged in");
                    }
                });
            }
            $("div#ticketModal").modal('show');
        }
    });
    //constructor function end below
});



// generate random number on different form
// var formsCollection = document.getElementsByTagName("form");

function myFunction(event) {
    // $("a.lotteryBuyMore").click(function() {});

    // console.log('button was pressed ' + event.form.id);
    if (event.id == "1") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);

    } else if (event.id == "2") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);
    } else if (event.id == "3") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);
    } else if (event.id == "4") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);
    } else if (event.id == "5") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);
    } else if (event.id == "6") {
        document.getElementById(event.form.id).elements[0].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[1].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[2].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[3].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[4].value = Math.floor((Math.random() * 45) + 1);
        document.getElementById(event.form.id).elements[5].value = Math.floor((Math.random() * 45) + 1);
    } else {
        return null;
    }

}
// number generator function ends here