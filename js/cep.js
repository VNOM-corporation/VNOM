(function consultarcep(){ 
 
    const cep = document.querySelector("input[name=cep_user]");
 
    cep.addEventListener('blur', e=> {
         const value = cep.value.replace(/[^0-9]+/, '');
         const url = `https://viacep.com.br/ws/${value}/json/`;
 
       fetch(url)
      .then( response => response.json())
      .then( json => {
                 
          if( json.logradouro ) {
            document.querySelector('input[name=rua_user]').value = json.logradouro;
                document.querySelector('input[name=bairro_user]').value = json.bairro;
                document.querySelector('input[name=cidade_user]').value = json.localidade;
                document.querySelector('input[name=uf_estado]').value = json.uf;
          }
         
       
      });
   });
 
 })();