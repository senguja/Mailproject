function send(mail) {
    console.log(mail)
    return fetch('/send', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(mail)
    }).then(response => response.json())

}

const Api = {
    send
}

export default Api;