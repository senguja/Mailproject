import Api from "./Api.js";
import multipleChoice from "./multiChoice.js";



export default function App() {
    document.querySelector('.-submit').addEventListener('click', function () {
        const data = getInput();
        if (data.firstName !== '' &&
            data.lastName !== '' &&
            data.email !== '' &&
            data.message !== ''
        )
        Api.send(data)
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


    document.getElementById('submit1').addEventListener('click', function (){
        let result= multipleChoice.showResults();

        console.log(result.filter(element => element === undefined ))
        if (result.filter(element => element === undefined ).length === 0){
            Api.saveAnswer(result)
                .then(data => console.log(data))
        }


    })





}