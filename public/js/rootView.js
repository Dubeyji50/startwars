$(function () {
    console.log("on load");
    $(".save-data").prop('disabled',true);
    //$(".char-film").hide();     
    $(document).on('click', '.btn-info', function () {
        $.ajax({
            url: $(this).attr('data-url'),
            type:'GET',
            beforeSend: function(){
                modalLoading(1)
            },
            success: function(response){
                console.log(response)
                fillDetails(response)
                modalLoading(0)
            },
            error:function(response){
                modalLoading(0)
                $('.modal').modal('toggle')
                toastr.error('The server cannot recover the details')
            }
        });
    })


    $(document).on('click', '.pull-people', function () {
        $(".char-data").show();
        $(".film-data").hide();  
    })

    $(document).on('click', '.pull-films', function () {
        $(".char-data").hide();
        $(".film-data").show();  
        $(".save-data").prop('disabled',false);
        $.ajax({
            url: $(this).attr('data-url'),
            type:'GET',
            beforeSend: function(){
                //modalLoading(1)
            },
            success: function(response){
                //console.log(response['results'])
                var films = response['results'];
                fillFilmsData(films)
                $(".save-data").prop('disabled',false);  
                //modalLoading(0)
            },
            error:function(response){
                modalLoading(0)
                $('.modal').modal('toggle')
                toastr.error('The server cannot recover the details')
            }
        });
    })    
})

$(".save-data").click(function(){
        var ary = [];
        $(".save-data").prop('disabled',true);
        $('.myTable tr').each(function (a, b) {
        var name = $('.attrName', b).text();
        var gen = $('.attrGen', b).text();
        var year = $('.attrByear', b).text();
        var col = $('.attrHcolor', b).text();
        ary.push({name,gen,year,col });
        });
        
        $.ajax({
            method:'POST',
            url: '/ajax/save',
            data:{'ary':ary},
            datatype: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              success: function(result)
              {
               var new_data = $.parseJSON(result);
                alert(JSON.stringify(new_data));
                var trHTML = '';
                for(var i=0;i<=new_data.length; i++)
                  {
                    trHTML += '<tr><td>' + i + '</td><td>' + new_data[i].id + '</td><td>';
                   } 
                   $('#records_table').append(trHTML);   
              },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
          })//ajax
});


function modalLoading (isLoading) {
    if (isLoading) {
        $('.modal .modal-body-content').hide()
        $('.modal .img-loading').show()
    } else {
        $('.modal .modal-body-content').show()
        $('.modal .img-loading').hide()
    }
}

function fillDetails(char){
    $('.td-modal-name').html(char.name)
    $('.td-modal-height').html(char.height)
    $('.td-modal-mass').html(char.mass)
    $('.td-modal-hair-color').html(char.hair_color)
    $('.td-modal-skin-color').html(char.skin_color)
    $('.td-modal-eye-color').html(char.eye_color)
    $('.td-modal-birth-year').html(char.birth_year)
    $('.td-modal-gender').html(char.gender)
}

function fillFilmsData(films){
    console.log(films);
    $.each(films, function (i,v)
    {
        var markup = "<tr><td>"+i+"</td><td>"+v.title+"</td><td>"+v.opening_crawl+"</td><td>"+v.director+"</td><td>"+v.producer+"</td><td>"+v.created+"</td></tr>";
        $(".film-table tbody").append(markup);
    });
   $(".save-data").prop('disabled',false);
}

