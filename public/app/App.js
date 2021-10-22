import Api from "./Api.js";

export default function App() {
    document.querySelector('.-submit').addEventListener('click', function () {
        const mail = getInput();

        Api.send(mail)
            .then(data => console.log(data))

    })

    function getInput() {
        return {
            firstName: document.getElementById('firstname').value,
            lastName: document.getElementById('lastname').value,
            email: document.getElementById('email').value,
            message: document.getElementById('message').value,
        }
    }


}