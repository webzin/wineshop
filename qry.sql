SELECT a.item_id, (SUM(a.qty) - SUM(b.qty)) AS quantity
FROM stock_in AS a, stock_out AS b
WHERE a.item_id = b.item_id GROUP BY item_id