$(document).ready(function(){
    $('#form-submit').on('submit', function(e){
        e.preventDefault();
		if( $('.input-title').val() === ''){ return alert('Write something in Title'); }
		if( $('.input-category').val() === ''){ return alert('Enter the category of work'); }
		if( $('.input-hour').val() === ''){ return alert('Add Working Hours'); }
        $.ajax({
            url : "php/add.php",
            method : "POST",
            data : new FormData(this),
            // dataType : 'JSON',
            contentType:false,
            processData:false,
            success:function(data)
            {
                load();
				totalHours();
                $('#form-submit').trigger('reset');
            }
        })	
    })


    // Load Post
    function load(){

    
		$.ajax({
			url:'php/load.php',
			method:'POST',
			dataType : 'JSON',
			contentType:false,
			// processData:false,
			success:function(data){
               let html = '';
               let i = 0;

               data.forEach(function(o){
                   html += `<tr>
                   <th scope="row">${o.counter}</th>
                   <td>${o.title}</td>
                   <td>${o.day} - ${o.month} - ${o.year}</td>
                   <td>${o.category}</td>
                   <td>${o.hours}</td>
                 </tr>`
               })
               $('#list-data').html(html);
            }

        })
    }
    load();

    // Insert Category
    $('.submit-category').on('click', function(){
      let categoryName = $('.category-name').val();
      if(categoryName === ''){ return alert('Empty field is invalid'); }

        $.ajax({
          url : "php/addCategory.php",
          method : "POST",
          data : {categoryName:categoryName},
          // dataType : 'JSON',
          // contentType:false,
          // processData:false,
          success:function(data)
          {
              alert(data+ ' Has been Added');
              $('.category-name').val('');
              loadCategory();
          }
      })

    })
    
    // Load Category
    function loadCategory(){
      $.ajax({
        url:'php/loadCategory.php',
        method:'POST',
        // dataType : 'JSON',
        contentType:false,
        // processData:false,
        success:function(data){
                  // console.log(data);
                $('#category-values').html(data);
              }
  
          })
    }
    loadCategory();

	function totalHours(){
    $.ajax({
      url:'php/totalHours.php',
      method:'POST',
      // dataType : 'JSON',
      contentType:false,
      // processData:false,
      success:function(data){
                console.log(data);
              $('.counted-hours').html(' '+data+' Hours');
            }

        })
		
	}
	totalHours();
    

})