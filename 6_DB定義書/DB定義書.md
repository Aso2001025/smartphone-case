# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001017/smartphone-case/blob/main/6_DB%E5%AE%9A%E7%BE%A9%E6%9B%B8/ER%E5%9B%B3.md)

# DBテーブルカラム一覧

# データベース設計図

## 購入テーブル(d_purchase)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダーID|order_id|bigint(20)|○|○||
|顧客コード|customer_code|varchar(50)||○|○|
|購入日|purchase_date|date||○||
|総額|total_price|int(11)||○||

## 購入詳細テーブル(d_purchase_detail)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダー詳細ID|detail_id|bigint(20)|○|○||
|オーダーID|order_id|bigint(20)|○|○|○|
|デザインコード|design_code|bigint(20)||○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## 顧客マスタ(m_customers)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客コード|customer_code|varchar(50)|○|○||
|パスワード|pass|varchar(50)||○||
|ニックネーム|nickname|varchar(50)||○||
|氏名|name|varchar(20)||○||
|住所|address|varchar(100)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|date||○||


## デザインテーブル(d_design)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|デザインコード|design_code|int(11)|○|○||
|デザイン名|design_name|varchar(50)||||
|顧客コード|customer_code|varchar(50)||○|○|
|機種コード|model_code|varchar(50)||○|○|
|タイプコード|type_code|varchar(50)||○|○|
|デザイン画像|design_image|varchar(500)||○||
|公開フラグ|release_flag|char(1)||||
|登録日|reg_date|date||○||

## デザイン詳細テーブル(d_design_detail)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|デザイン詳細コード|design_detail_code|bigint(20)|○|○||
|デザインコード|design_code|bigint(20)|○|○|○|
|素材コード|material_code|int(11)|||○|
|画像コード|image_code|int(11)|||○|
|フォントコード|font_code|int(11)|||○|
|X座標|x_postion|int(5)||○||
|Y座標|y_postion|int(5)||○||
|Z座標|z_postion|int(5)||○||
|縦|heigth|int(5)||○||
|横|weigth|int(5)||○||

## ユーザ登録画像テーブル(d_image)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|画像コード|image_code|int(11)|○|○||
|顧客コード|customer_code|varchar(50)|○|○|○|
|画像|image_data|varchar(500)||○||
|画像名|image_name|varchar(50)||○||
|削除フラグ|del_flag|int(11)||||
|登録日|reg_date|date||○||

## 素材マスタ(m_material)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|素材コード|material_code|int(11)|○|○||
|カテゴリコード|category_code|varchar(50)||○|○|
|素材名|material_name|varchar(20)||○||
|素材データ|material_data|varchar(500)||○||
|削除フラグ|del_flag|int(11)||||
|登録日|reg_date|date||○||

## カテゴリマスタ(m_category)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|カテゴリコード|category_code|varchar(50)|○|○||
|カテゴリ名|category_name|varchar(20)||○||
|登録日|reg_date|date||○||

## モデルマスタ(m_model)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|機種コード|model_code|varchar(50)|○|○||
|モデル名|model_name|varchar(50)||○||
|登録日|reg_date|date||○||

## タイプマスタ(m_type)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|タイプコード|type_code|varchar(50)|○|○||
|タイプ名|type_name|varchar(50)||○||
|価格|price|int(11)||○||

## フォントマスタ(m_font)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|フォントコード|font_code|varchar(50)|○|○||
|フォント名|type_name|varchar(50)||○||


## カートテーブル(d_cart)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|デザインコード|design_code|bigint(20)|○|○|○|
|カスタマーコード|customer_code|varchar(50)|○|○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||
|削除フラグ|del_flag|char(1)||||
|登録日|reg_date|date||○||

## クレジットマスタ(d_credit)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|クレジットコード|pay_code|bigint(20)|○|○||
|カスタマーコード|customer_code|varchar(50)||○|○|
|カード番号|card_number|bigint(16)||○||
