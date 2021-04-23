<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
		<div class="menu">
			<div class="containe">
				<div class="row">
					<div class="col-md-12">
					<a id="all" class="btn btn-primary btn-sm" href="">All Student</a>
					<a id="add_student" class="btn btn-primary btn-sm" href="">Add a new student</a>
					</div>
				</div>
			</div>
		</div>

<div class="app">

</div>
	



	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
	$('#add_student').click(function(){
		
		$.ajax({
				url: 'create.php' ,
				success: function(data){
					$('.app').html(data);
				}
		});
		return false;

	});


	$(document).on('click' , '#profile' , function(){
		let id= $(this).attr('profile_id');

		$.ajax({
				url: 'profile.php',
				method: 'POST',
				data:{
					id:id
				},
				success: function(data){
					$('.app').html(data);
				}

		});
		return false;

	});

	$(document).on('click' , '#profile_back' , function(){
		$.ajax({
				url: 'all.php',
				success: function(data){
					$('.app').html(data);
					alldata();
				}

		});
		return false;

	});


	$('#all').click(function(){

		$.ajax({
			url: 'all.php',
			success: function(all){
				$('.app').html(all);
				alldata();
			}
		});
		return false;
	}); 
	$.ajax({
			url: 'all.php',
			success: function(all){
				$('.app').html(all);
				alldata();
			}
		}); 

		$(document).on('submit', '#student_form', function(){
			
			$.ajax({
					url: 'ajax_template/create.php',
					method: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success:function(data){
						swal({
							title: 'Data Added',
							text: 'Student Added Successfully!!',
							icon: 'success'
						});
					$('#student_form')[0].reset();

				}
			});

			return false;
		});
		alldata();

		function alldata(){
			$.ajax({
			url: 'ajax_template/all_student.php',
			success: function(data){
			
				$('#all_student_data').html(data);
			}

		});
		}

		$(document).on('click' , 'a.delete-btn' , function(){
			
			let id = $(this).attr('delete_id');

			swal({
				title: 'Are you sure?',
				text: 'Delete studemt data',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			}).then((conf) =>{

				if(conf){

					$.ajax({
					url: 'ajax_template/delete.php',
					method: "POST",
					data:{
						id: id
					},
					success: function(data){
						swal({
							title: 'done!',
							text: 'This student deleted',
							icon: 'success'
						});
						alldata();
					}
				});

				}else{
					swal({
						title: 'safe',
						text: 'Student data safe',
						icon: 'success'
					});

				}
			});

			return false;
		});

	</script>
</body>
</html>