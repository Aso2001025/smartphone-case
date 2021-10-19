```uml
@startuml
skinparam class {
    '図の背景
    BackgroundColor Snow
    '図の枠
    BorderColor Black
    'リレーションの色
    ArrowColor Black
}
!define MASTER_MARK_COLOR Orange 
!define TRANSACTION_MARK_COLOR DeepSkyBlue
package "ECサイト" as target_system {
    /'
      マスターテーブルを M、トランザクションを T などで表記
      １文字なら "主" とか "従" まど日本語でも記載可能
     '/
    entity "顧客マスタ" as customer <m_customers> <<M,MASTER_MARK_COLOR>> {
        + customer_code [PK]
        --
        pass
        name
        nickname
        address
        tel
        mail
        del_flag
        reg_date
    }
    
    entity "購入テーブル" as order <order> <<T,TRANSACTION_MARK_COLOR>> {
        + order_id [PK]
        --
        # customer_code [FK]
        purchase_date
        total_price
    }
    
    entity "購入詳細テーブル" as order_detail  <order_detail> <<T,TRANSACTION_MARK_COLOR>> {
        + detail_id[PK]
        + order_id[PK]
        --
        # design_code [FK]
        price
        num
    }
    
    entity "デザインテーブル" as design <design> <<T,TRANSACTION_MARK_COLOR>> {
        + design_code [PK]
        --
        design_name
        # customer_code [FK]
        # model_code [FK]
        image
        reg_date
    }
    
     entity "デザイン詳細テーブル" as design_detail <design_detail> <<T,TRANSACTION_MARK_COLOR>> {
        + design_detail_code [PK]
        + design_code [PK]
        --
        # material_code [FK]
        # image_code [FK]
        # font_code [FK]
        x_postion
        y_postion
        z_postion
        height
        weigth
        
    }
    
    entity "ユーザ登録画像テーブル" as image <image> <<T,TRANSACTION_MARK_COLOR>> {
        + image_code [PK]
        + customer_code [PK]
        --
        image
        image_name
        del_flag
        reg_date
    }
    
    entity "素材マスタ" as material <m_material> <<M,MASTER_MARK_COLOR>> {
        + material_code [PK]
        --
        category_code [FK]
        material_name
        material_data
        del_flag
        reg_date
    }
    
    entity "カテゴリマスタ" as category <m_category> <<M,MASTER_MARK_COLOR>> {
        + category_code [PK]
        --
        category_name
        reg_date
    }
    
    entity "モデルマスタ" as model <m_model> <<M,MASTER_MARK_COLOR>> {
        + model_code [PK]
        --
        model_name
        reg_date
    }
    
    entity "タイプマスタ" as type <m_type> <<M,MASTER_MARK_COLOR>> {
        + type_code [PK]
        --
        type_name
       price
    }
    
    entity "フォントマスタ" as font <m_font> <<M,MASTER_MARK_COLOR>> {
        + font_code [PK]
        --
       font_name
    }
  }
  
customer       |o-u-o{     order
customer       }-d-o{     image
order          ||-r-|{     order_detail
order_detail   }-d-||     design
design         }o-l-||    customer
design         }o-r-o{     model
design         }o-r-o{     type
design         }o-r-o{     font
design         }o-d-o{     design_detail
design_detail  }o-r-o{     image
design_detail  }o-d-o{     material
material       }o-r-||    category
@enduml
```
