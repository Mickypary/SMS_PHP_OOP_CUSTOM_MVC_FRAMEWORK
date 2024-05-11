<?php


/**
 * pagination class
 */
class Pager
{
	public $links 			= array();
	public $offset 			= 0;
	public $page_number 	= 1;
	public $start 			= 1;
	public $end 			= 1;

	public function __construct($limit = 10, $extras = 1)
	{
		$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$page_number = $page_number < 1 ? 1 : $page_number; 
		$this->offset = ($page_number - 1) * $limit;
		$this->page_number = $page_number;
		$this->start = $this->page_number - $extras;
		$this->end = $this->page_number + $extras;
		if ($this->start < 1) {
			$this->start = 1;
		}
		
		// echo $_SERVER['QUERY_STRING']; die();
		$current_link = ROOT .'/'. str_replace('url=', "", $_SERVER['QUERY_STRING']);	
		$current_link = !strstr($current_link, "page=") ? $current_link .'&page=1' : $current_link;
		$first_link = preg_replace("/page=[0-9]+/", 'page=1', $current_link);
		$next_link = preg_replace("/page=[0-9]+/", 'page='.($page_number+1), $current_link);
		
		$this->links['first_link'] = $first_link; 
		$this->links['current_link'] = $current_link; 
		$this->links['next_link'] = $next_link; 
	}

	public function display()
	{
		?>

		<br class="clearfix">

		<div>
			<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-center">
			    <li class="page-item"><a class="page-link" href="<?= $this->links['first_link'] ; ?>">First</a></li>

			    <?php for ($x=$this->start; $x <= $this->end; $x++): ?>
			    	<li class="page-item"><a class="page-link <?= ($x == $this->page_number) ? 'active' : '' ?>" href="<?= preg_replace('/page=[0-9]+/', 'page='.$x, $this->links['current_link']) ; ?>"><?= $x ?></a></li>
			    <?php endfor ?>
			    
			    <li class="page-item"><a class="page-link" href="<?= $this->links['next_link'] ?>">Next</a></li>
			  </ul>
			</nav>
		</div>

		<?php
	}


} // End Class