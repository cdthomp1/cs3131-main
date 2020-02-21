document.getElementById('copyRight').insertAdjacentHTML('beforeend', `<p id='byui-copyright'>Copyright ${new Date().getFullYear()} Mint Auto Group</p>`)

function matchPassword() {
    var passwordOne = document.getElementById('passwordOne').value;
    var passwordTwo = document.getElementById('passwordTwo').value;

    if (passwordOne !== passwordTwo) {
        document.getElementById('passowrdMatch').innerText = "Passwords Don't match!";
    } else {
        document.getElementById('passowrdMatch').style.display = 'none';
    }
}