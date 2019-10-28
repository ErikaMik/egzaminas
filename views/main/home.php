<div class="container">
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Pavadinimas</th>
        <th scope="col">Diena</th>
        <th scope="col">Laikas</th>
        <th scope="col">Amžiaus cenzas</th>
        <th scope="col">Salė</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php if(count($this->movies)): ?>
                <?php foreach($this->movies as $movie): ?>
<!--                    --><?php //if(date('H') > date("H", strtotime($movie->time)) ): ?>
<!--    --><?php //echo date('H')?>
<!--    --><?php //echo date("H", strtotime($movie->time))?>
                    <tr>
                       <td></td>
                       <td><?php echo $movie->movie ?></td>
                       <td><?php echo $movie->date ?></td>
                       <td><?php echo date("H:i", strtotime($movie->time)) ?></td>
                       <td><?php echo $movie->census ?></td>
                       <td><?php echo $movie->hall ?></td>
                    </tr>
<!--                    --><?php //endif; ?>
                <?php endforeach; ?>
        <?php endif; ?>
    </tr>
    </tbody>
</table>
</div>
