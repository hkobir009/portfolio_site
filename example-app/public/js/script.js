
//                   Protfolio page function

$('#All').click(function() {
    $('.p-all').removeClass('d-none');
})
$('#E-COMMERCE').click(function() { 
    $('.p-ecom').removeClass('d-none');
})
$('#BUSINESS').click(function() { 
    $('.p-business').removeClass('d-none');
})
$('#PORTAL').click(function() {
    $('.p-portal').removeClass('d-none');
})
$('#PORTFOLIO').click(function() {
    $('.p-portfolio').removeClass('d-none');
})

//                   Contact Insert data confrom btn

$('#contactAddConfirmBtn').click(function() {
    let name = $('#contactAddNameID').val();
    let email = $('#contactAddMailID').val();
    let phone = $('#contactAddPnID').val();
    let Website = $('#contactAddWebID').val();
    let massege = $('#contactAddMsgID').val();
    let currentdate = $('#dateId').html();

    insertContactData(name,email,phone,Website,massege,currentdate);

})

//                        Contact Insert data 

function insertContactData(name,email,phone,Website,massege,currentdate){   
        if (name.length==0) {
            $('#contactAddConfirmBtn').html('Enter Your Name')
            setTimeout(function(){
            $('#contactAddConfirmBtn').html('SEND MASSEGE');
            },2000)
        }else if (email.length==0) {
            $('#contactAddConfirmBtn').html('Enter Your Email')
            setTimeout(function(){
            $('#contactAddConfirmBtn').html('SEND MASSEGE');
            },2000)
        }else if (phone.length==0) {
            $('#contactAddConfirmBtn').html('Enter Your Phone')
            setTimeout(function(){
            $('#contactAddConfirmBtn').html('SEND MASSEGE');
            },2000)
        }else if (massege.length==0) {
            $('#contactAddConfirmBtn').html('Enter Your Massege')
            setTimeout(function(){
            $('#contactAddConfirmBtn').html('SEND MASSEGE');
            },2000)
        }else{
            $('#contactAddConfirmBtn').html('Sending...')
            axios.post('/insertContactData', {
                 contact_name:name,
                 contact_email:email,
                 contact_phone:phone,
                 contact_website:Website,
                 contact_massege:massege,
                 created_date:currentdate
                 })
                 .then(function(response) {
                     if (response.status==200) {
                         if (response.data==1) {
                             $('#contactAddConfirmBtn').html('Send Successfully')
                             setTimeout(function(){
                             $('#contactAddConfirmBtn').html('SEND MASSEGE');
                             },5000)
                                name = $('#contactAddNameID').val('');
                                email = $('#contactAddMailID').val('');
                                phone = $('#contactAddPnID').val('');
                                Website = $('#contactAddWebID').val('');
                                massege = $('#contactAddMsgID').val('');
                         }else{
                             $('#contactAddConfirmBtn').html('Send Failed,Please Try Again')
                             setTimeout(function(){
                             $('#contactAddConfirmBtn').html('SEND MASSEGE');
                             },2000)
                         }
                     }else{
                         $('#contactAddConfirmBtn').html('Send Failed,Please Try Again')
                         setTimeout(function(){
                         $('#contactAddConfirmBtn').html('SEND MASSEGE');
                         },2000)
                     }
                 })
                 .catch(function(error) {
                     $('#contactAddConfirmBtn').html('Send Failed,Please Try Again')
                     setTimeout(function(){
                     $('#contactAddConfirmBtn').html('SEND MASSEGE');
                     },2000)
                 });
                 
        }
        
}

