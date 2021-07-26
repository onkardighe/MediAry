
function DeleteDonor($donorId)
{
    console.log("Deleted");
    var par = $(this).parent().parent();
    $fname = Array.from($donorId)[0].cells.items(0).innerText;
    $lname = Array.from($donorId)[0].cells.item(1).innerText;
    $age = Array.from($donorId)[0].cells.item(2).innerText;
    $gender = Array.from($donorId)[0].cells.item(3).innerText;
    $bgrp = Array.from($donorId)[0].cells.item(4).innerText;
    $recoverydate = Array.from($donorId)[0].cells.item(5).innerText;
    $mono = Array.from($donorId)[0].cells.item(6).innerText;
    $email = Array.from($donorId)[0].cells.item(7).innerText;
    $other = Array.from($donorId)[0].cells.item(9).innerText;
    alert('Array.from($donorId)[0].cells.item(9).innerText');

    // $queryDelete =  "DELETE FROM `plasma_registration` WHERE 'fname'= ('$fname')";

    
}

