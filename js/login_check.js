/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function check(form)/*function to check userid & password*/
{
    var x = document.getElementById("user1");
/*the following code checkes whether the entered userid and password are matching*/
if( x.value == 'admin' && form.pswrd.value == "admin")
{
window.open('http://localhost/mgmt/employee_data_entry.php')/*opens the target page while Id & password matches*/
}
else
{
alert("Error Password or Username")/*displays error message*/
}
}

