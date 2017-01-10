<?php include('public_header.php'); ?>
  <div class="container">
      <h1>All Articles</h1>
      <hr>
      <div class="container col-lg-offset-3 col-lg-6" >
        <table class="table table-striped table-hover ">
            <thead>
                <th style="font-size: 24px; font-weight: bold" >Sr. No.</th>
                <th style="font-size: 24px; font-weight: bold"> Title</th>
                <th style="text-align:right;  font-size: 24px; font-weight: bold">Published On</th>
            </thead>
            <tbody>
            
            <?php if (count($articles)) : ?>
                <?php $i = $this->uri->segment(3)+1 ?>
                <?php foreach($articles as $article) : ?>
                    <tr>
                        <td style="font-size: 16px;"><?= $i++; ?></td>
                        <td style="font-size: 16px; text-decoration: none;"><?=  anchor("user/article/{$article->id}",$article->title,["style"=>"text-decoration:none; font-weight:bold; color:Black; text-transform: capitalize;"])?></td>
                        <td style="font-size: 16px; text-align: right"> <?= $article->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                    <tr>
                        <td colspan="3" style ="font-size: 20px">
                            No Record Found
                        </td>
                    </tr>
            <?php endif; ?>     
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>     
  </div>

<?php include('public_footer.php'); ?>