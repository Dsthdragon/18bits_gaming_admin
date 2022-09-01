
$(document).ready(function(){
    tinymce.init({ 
        selector:'#post',
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
          ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft",
        contextmenu: "link image inserttable | cell row column deletetable",
        branding: false,
        height: 800,
		relative_urls: false,
		remove_script_host: false,
        image_advtab: true,
        image_description: false,
        file_picker_types: "image",
        file_picker_callback: function(callback, value, meta){
        	imageFilePicker(callback, value, meta);
        },
        // we override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) { 
            
            data = new FormData();
            data.append('file_param', blobInfo.blob(), blobInfo.filename());
            data.append('type', "image");
    		
    		var url = $("#uploadLink").val();
    		$.ajax({
    			url: $("#uploadLink").val(),
    			method: "POST",
    			data: data,
    			contentType: false,
    			processData: false,
    			success: function(o){
    				console.log(o);
    				json = JSON.parse(o);
    				success(json.location);
    			}
    		})
        }
    });
    var imageFilePicker = function (callback, value, meta){
    	tinymce.activeEditor.windowManager.open({
    		title: 'File and Image Picker',
    		url: $("#managerLink").val(),
    		width: 700,
    		height: 400,
    		buttons: [{
    			text: 'insert',
    			onclick: function() {
    				$.ajax({
    					url: ImageGallerySelected,
    					type: 'HEAD',
    					success: function(){
    						console.log(ImageGallerySelected);
    						callback(ImageGallerySelected);
    					},
    					error: function(){
    						console.log(ImageGallerySelected);
    						console.log("error");
    					}
    				})
    				tinymce.activeEditor.windowManager.close();
    			}
    		},
    		{
    			text: 'Close',
    			onclick: 'close'
    		}],
    	});
    }
	$('#TagText').keyup(function(){
		var tag = $('#TagText').val()
		var post = $("#TagText").attr('data-post');
		var url  = $("#TagText").attr('data-url');
		if(tag.length > 3){
			getTags(tag, post, url)
		} else {
			$("#_titleList").html(null);
			$('#_titleBox').hide();
		}
	});

	$('#AddTag').click(function(){
		var data = $("#addTagForm input").serializeArray();
		var url = $("#AddTag").attr('data-url')
		$.post( url, data, function(o) { alert(o)});
		$("#_titleList").html(null);
		$('#_titleBox').hide();

		$('#TagText').val('')
		var link = $('#selectTags').attr('data-url');
		$.get(link , function(o){
			$('#myTagsContainer').html(o);
		})
	})

	function getTags(tags, post, url){
		var data = $("#addTagForm input").serializeArray();

		$.post( url + post, data, function(o) {
			if(o !== 0){
				$("#_titleList").html(o);
				$('#_titleBox').show(100);
			} else {
				$("#_titleList").html(null);
				$('#_titleBox').hide();
			}
		});
	}
	$("#myTagsContainer").on('click', '.deleteTag', function(e){
		var url = $(this).attr('data-url');
		$.get(url, function(e){ alert(e) })
		var link = $('#selectTags').attr('data-url');
		$.get(link , function(o){
			$('#myTagsContainer').html(o);
		})
		
	})

	$('#selectTags').click(function(){
		$('#myTagsContainer').html("<div class='center-align'><span class='fa fa-5x fa-refresh fa-spin'></span></div>");
		UIkit.modal("#addTagModal").show();
		var link = $(this).attr('data-url');
		$.get(link , function(o){
			$('#myTagsContainer').html(o);
		})
	});

	$('.roleBox').click(function(){
		var id = $(this).attr("data-id");
		var checked = $("#accessCheck"+id).prop('checked');
		$("#accessCheck"+id).prop('checked', checked ? false : true);
		$(this).toggleClass('card-selected-blue');
	});

	$('#myManagerContainer').on('click', '.roleBox', function(){
		var id = $(this).data('id');
		var image = $(this).data('image');
		$('#selectedImg').val(id);
		$('#imageHolder').attr('src', image);
		$(".selecteImageText").text("Image Selected");
		UIkit.modal("#selectImageModal").hide();
		setSelected();
	});

	$('#myManagerContainer').on('click', '.paginateImages', function(){
		$('#myManagerContainer').html("<div class='center-align'><span class='fa fa-5x fa-refresh fa-spin'></span></div>");
		var current  = $(this).data('current-page');
		var link = $("#myManagerLink").val();
		var id = $('#selectedImg').val();
		$.get(link + "/" + current + '?id=' + id , function(o){
			$('#myManagerContainer').html(o);
		})
	});
	$('#myManagerContainer').on('click', '#addImageButton', function(){
		$('#addImageInput').click();
	});
	$('#myManagerContainer').on('change', '#addImageInput', function(){
		$('#addImage').click();
	});
	$('#myManagerContainer').on('submit', '#addImageForm', function(e){
		e.preventDefault();
		var data = new FormData(this);
		
		var url = $("#uploadLink").val();
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			contentType: false,
			processData: false,
			success: function(o){
				console.log(o);
				json = JSON.parse(o);
				if(json.status == "success"){
					$('#selectedImg').val(json.id);
					$(".selecteImageText").text("Image Selected");
					$("#selectImageModal").modal('close');
				}
				alert(json.message)
			}
		})
	});
	$('#selectImage').click(function(){
		$('#myManagerContainer').html("<div class='uk-text-center'><span class='fa fa-5x fa-refresh fa-spin'></span></div>");
		UIkit.modal("#selectImageModal").show();
		var link = $("#myManagerLink").val();
		var id = $('#selectedImg').val();
		$.get(link + '?id=' + id , function(o){
			$('#myManagerContainer').html(o);
		})
	});
	$("#openGameGalleryModal").click(function(){
		$('#gameGalleryContainer').html("<div class='uk-text-center'><span class='fa fa-5x fa-refresh fa-spin'></span></div>");
		UIkit.modal("#gameGalleryModal").show();
		var link = $("#addToGameGallery").val();
		$.get(link, function(o){
			$('#gameGalleryContainer').html(o);
		})
	});
	$('#gameGalleryContainer').on('click', '.gotoPage', function(){
		var link = $(this).attr("data-current-page");
		$.get(link, function(o){
			$('#gameGalleryContainer').html(o);
		})
	});
	$('#gameGalleryContainer').on('click', '.setGameGallery', function(){
		var link = $(this).attr("data-link");
		var link2 = $(this).attr("data-current-page");
		$.get(link, function(o){})
		$.get(link2, function(o){
			$('#gameGalleryContainer').html(o);
		})
	});
	function setSelected(){
		var link = null;
		if($('#selectedImg').attr("data-page") == "article"){
			link = $("#setArticleImage").val();
			link = link +'/'+$('#selectedImg').attr("data-article") + '?id=' + $('#selectedImg').val();
			$.get(link, function(o){
				"Main Image Set";
			})
		}
	}
	$('.singleDatePicker').datetimepicker({
		format: "Y-m-d",
		formatDate: "Y-m-d",
		timepicker: false
	});
});