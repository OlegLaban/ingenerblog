<h3><a href="/category/<?php echo $catF['id']?>/"><?php echo $catF['title'] ?></a></h3>
					<ul class="PodCatUl">
					<?php
						foreach( $pod_catF as $pod_cat ){?>
								<li><a href="/podcategory/<?php echo $catF['id']; ?>/<?php echo $pod_cat['id']; ?>/" class="podCat"><?php echo $pod_cat['title_pod_cat']; ?></a></li>
							<?php }	?>

					</ul>
