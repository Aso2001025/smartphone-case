# データベース設計図

## d_purchase

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|order_id|bigint(20)|○|○||
|customer_code|varchar(50)||○|○|
|purchase_date|date||○||
|total_price|int(11)||○||

## d_purchase_detail

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|detail_id|bigint(20)|○|○||
|order_id|bigint(20)|○|○|○|
|design_code|int(11)||○|○|
|price|int(11)||○||
|num|int(11)||○||

## m_customers

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|varchar(50)|○|○||
|pass|varchar(50)||○||
|name|varchar(20)||○||
|nickname|varchar(20)||○||
|address|varchar(100)||○||
|tel|varchar(20)||○||
|mail|varchar(100)||○||
|del_flag|int(1)||||
|reg_date|date||○||


## d_design

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|design_code|int(11)|○|○||
|design_name|varchar(50)||○||
|customer_code|varchar(50)||○|○|
|model_code|varchar(50)||○|○|
|design_image|image||○||
|release_flag|char(1)||||
|reg_date|date||○||

## d_design_detail

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|detail_id|bigint(20)|○|○||
|order_code|bigint(20)|○|○|○|
|material_code|int(11)|||○|
|image_code|int(11)|||○|


## d_image

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|image_code|int(11)|○|○||
|customer_code|varchar(50)|○|○|○|
|image_data|image||○||
|image_name|varchar(50)||○||
|del_flag|int(11)||||
|reg_date|date||○||

## m_material

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|material_code|int(11)|○|○||
|category_code|varchar(50)||○|○|
|material_name|varchar(20)||○||
|material_data|varchar(500)||○||
|del_flag|int(11)||||
|reg_date|date||○||

## m_category

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|category_code|varchar(50)|○|○||
|category_name|varchar(20)||○||
|reg_date|date||○||

## m_model

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|model_code|varchar(50)|○|○||
|model_name|varchar(50)||○||
|reg_date|date||○||
