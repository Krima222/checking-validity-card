const elemEnter = document.querySelector('input[name="inp"]')
const elemOutput = document.querySelector('div[data-id="box1"]')
console.log(elemOutput)

const getData = async () => {
    let res = await fetch(`http://localhost/test/test.php?${elemEnter.value}`)
    let data = await res.text()
    console.log(data)
    elemOutput.textContent = `${data}`
}
document.querySelector('button').addEventListener('click', () => {
    getData()
})
