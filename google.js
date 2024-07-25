const scriptURL = 'https://script.google.com/macros/s/AKfycbzc-LV7y9i207xCN13OTZ6QrMRM7n66v53BrdDLuldhftnV1I74rYj44A5f8Ms_CYu0/exec'

const form = document.forms['formdata']

form.addEventListener('submit', e => {
  e.preventDefault()
  fetch(scriptURL, { method: 'POST', body: new FormData(form)})
  .then(response => alert("Thank you! your form is submitted successfully." ))
  .then(() => { window.location.reload(); })
  .catch(error => console.error('Error!', error.message))
})