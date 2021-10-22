import Api from "./Api.js";

export default function App() {
    document.querySelector('.-submit').addEventListener('click', function () {
        const mail = getInput();

        Api.send(mail)
            .then(data => console.log(data))

    })

    function getInput() {
        return {
            firstname: document.getElementById('firstname'),
            lastname: document.getElementById('lastname'),
            email: document.getElementById('email'),
            message: document.getElementById('message'),
        }
    }


}