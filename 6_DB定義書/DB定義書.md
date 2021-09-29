# DB定義書
## ER図
[ER図はこちら]()

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
|デザインコード|design_code|int(11)||○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## 顧客マスタ(m_customers)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客コード|customer_code|varchar(50)|○|○||
|パスワード|pass|varchar(50)||○||
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
|デザイン名|design_name|varchar(50)||○||
|顧客コード|customer_code|varchar(50)||○|○|
|機種コード|model_code|varchar(50)||○|○|
|デザイン画像|design_image|image||○||
|登録日|reg_date|date||○||

## デザイン詳細テーブル(d_design_detail)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|デザイン詳細コード|detail_id|bigint(20)|○|○||
|デザインコード|order_code|bigint(20)|○|○|○|
|素材コード|material_code|int(11)|||○|
|画像コード|image_code|int(11)|||○|


## ユーザ登録画像テーブル(d_image)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|画像コード|image_code|int(11)|○|○||
|顧客コード|customer_code|varchar(50)|○|○|○|
|画像|image_data|image||○||
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
|カテゴリコード|category_code|int(11)|○|○||
|カテゴリ名|category_name|varchar(20)||○||
|登録日|reg_date|date||○||

## モデルマスタ(m_model)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|機種コード|model_code|varchar(50)|○|○||
|モデル名|model_name|varchar(50)||○||
|登録日|reg_date|date||○||
