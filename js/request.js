
function handleBrand(){
   
    
    var x = document.getElementById("select-brand").value;
    axios.post('description.php',{params:x})
     .then((response)=>{
        const data = response.data;
        const modelSelect = document.getElementById('model-select'); 
        let optionsHTML = '';
        data.forEach(function (item) {
            optionsHTML += `<option value="${item.catID}">${item.model}</option>`;
        });
        modelSelect.innerHTML = optionsHTML;
     })
}