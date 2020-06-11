<?php
session_start();
?>
<HTML>
	<HEAD>
		<TITLE>Votre Panier</TITLE>
	</HEAD>
	<BODY>
		<div id="shopping-cart">
			<div class="txt-heading">Contenu du panier</div>
								
			<a id="btnEmpty" href="index.php?action=empty">Vider le panier</a>
			<?php
				if(isset($_SESSION["cart_item"])){
					$total_quantity = 0;
					$total_price = 0;
			?>	
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
				<tr>
				<th style="text-align:left;">Nom</th>
				<th style="text-align:left;">Code</th>
				<th style="text-align:right;" width="5%">Quantité</th>
				<th style="text-align:right;" width="10%">Prix Unitaire</th>
				<th style="text-align:right;" width="10%">Prix</th>
				<th style="text-align:center;" width="5%">Retirer</th>
				</tr>	
				<?php		
					foreach ($_SESSION["cart_item"] as $item){
						$item_price = $item["quantité"]*$item["prix"];
						?>
								<tr>
								<td><img src="<?php echo $item["lien"]; ?>" class="cart-item-lien" /><?php echo $item["nompro"]; ?></td>
								<td><?php echo $item["code"]; ?></td>
								<td style="text-align:right;"><?php echo $item["quantité"]; ?></td>
								<td  style="text-align:right;"><?php echo "$ ".$item["prix"]; ?></td>
								<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
								<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" 
								class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
								</tr>
								<?php
								$total_quantity += $item["quantité"];
								$total_price += ($item["prix"]*$item["quantité"]);
						}
				?>
				<tr>
				<td colspan="2" align="right">Total:</td>
				<td align="right"><?php echo $total_quantity; ?></td>
				<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
				<td></td>
				</tr>
				</tbody>
			</table>		
			<?php
				} else {
			?>
			<div class="no-records">Votre panier est vide</div>
			<?php 
				}
			?>
		</div>

		<div id="product-grid">
			<?php
			require_once("./modelOTD/model.php");
            $panier = new dbotd();
			$sql = "SELECT lien,nompro,prix,code FROM produits ORDER BY id ASC";
			$product_array = $panier->runQuery($sql);
			if (!empty($product_array)) { 
				foreach($product_array as $key=>$value){
			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
					<div class="product-lien"><img src="<?php echo $product_array[$key]["lien"]; ?>"></div>
					<div class="product-tile-footer">
					<div class="product-title"><?php echo $product_array[$key]["nompro"]; ?></div>
					<div class="product-prix"><?php echo "$".$product_array[$key]["prix"]; ?></div>
					<div class="cart-action"><input type="text" class="product-quantity" name="quantité" value="1" size="2" />
					</div>
					</form>
				</div>
			<?php
				}
			}
			?>
		</div>
	</BODY>
</HTML>
