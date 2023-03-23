function hideSearch() {
    document.getElementById("searchBox").style.display = "none";
}

function hintUpdate(str){

    $.ajax({
        url : 'gethints.php?title=' + str,
        type : 'GET',
        success : function(data){
           var books = jQuery.parseJSON(data);
           console.log(data);

           var list = document.getElementById('hints');
           list.innerHTML = '';

           books.forEach(function(item){
               var option = document.createElement('option');
               option.value = item;
               list.appendChild(option);
           });
        }
     });

}
