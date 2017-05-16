<?php $examId =$this->uri->segment(3); ?>
<fieldset><legend>Questions</legend>
		<table class="table table-bordered">
			<th>Question</th><th>Subject</th><th>Level</th><th>Actions</th>
			<?php
				foreach($questionData as $row){
				if($row->examID == $examId){
					echo "<tr><td>" . $row->question ."</td>";
					echo "<td>" . $row->subject ."</td>";
					echo "<td>".$row->points."</td>";
					echo 	"<td>
							<a href='" .base_url(). "index.php/Admin/deleteQuestion/". $row->questionID ."'  class='btn btn-default btn-sm'>
							<span class='glyphicon glyphicon-trash'></span></a>
							</button>
							<a href='" .base_url(). "index.php/Admin/viewQuestion/". $row->questionID ."' class='btn btn-default btn-sm'>
							<span class='glyphicon glyphicon-eye-open'></span>
							</button>
							<a href='" .base_url(). "index.php/Admin/updateQuestion/". $row->questionID ."' class='btn btn-default btn-sm'>
							<span class='glyphicon glyphicon-edit'></span>
							</button>				
							</td></tr>";
					}
				}
			?>
			<tr><td colspan="6">
				<div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class="glyphicon glyphicon-plus"></span> Add question	<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="<?php echo base_url();?>index.php/admin/addQuestion/openEnded/<?= $examId ?>">Open ended</a></li>
					<li><a href="<?php echo base_url();?>index.php/admin/addQuestion/multipleChoice/<?= $examId ?>">Multiple choice</a></li>
					<li><a href="<?php echo base_url();?>index.php/admin/addQuestion/checkbox/<?= $examId ?>">checkbox (multiple solutions possible)</a></li>
				  </ul>
				</div>
				
				</td></tr>
		</table>
		</fieldset>
		
		<a href="<?php echo base_url();?>index.php/admin/examOverview" class="btn btn-primary">Back to exam overview</a>
