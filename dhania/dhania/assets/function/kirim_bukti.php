<?php if ($pecah['status_pembelian']=="pending"): ?>
<a href="checkout.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success">
Pembayaran
</a>
<?php else: ?>
<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-warning">
Lihat Pembayaran
</a>
<?php endif ?>