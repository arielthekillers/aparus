<?php
$a = 0;
$b = 0;
foreach ($shortcut as $dd) : $a++; ?>
    <?php $b = $a % 3;
    ($b == 0 ? '</div><div class="row g-0">' : '');
    ?>
    <div class="col">
        <a class="dropdown-icon-item" href="<?= $dd['link']; ?>">
            <img src="/uploads/shortcut/_small/<?= $dd['icon']; ?>" alt="Github">
            <span><?= $dd['nama']; ?></span>
        </a>
    </div>
<?php
endforeach; ?>