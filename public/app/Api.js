function send(data) {
    console.log(data)
    return fetch('/send', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => response.json())

}

function saveAnswer(data) {
    console.log(data)
    return fetch('/saveAnswer', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => response.json())

}

function getQuestions(surveyId){
    return fetch(`/getQuestions?${surveyId}`)
        .then(response => response.json())
}

const Api = {
    send,
    saveAnswer,
    getQuestions
}

export default Api;