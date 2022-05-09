# Sports Nutrition Webshop

### Admin Account:
`
Username: sae
Password: test
`
### User Account (without admin privileges):
`
Username: user
Password: test
`

## Technologies used
- HTML :rose:
- SASS :hamster:
- Vanilla Javascript :zap:
- Custom PHP Framework :diamond_shape_with_a_dot_inside:
- Custom CMS :crown:

## Database Structure
### Products
```
id : int(11) : primary_key : auto_increment
category_id : int(11)
goal_id : int(11)
merchant_id : int(11)
name : varchar(45)
description : varchar(450)
price : float
serving : float
ingredients : varchar(450)
weight : float
is_featured : tinyint(1) : default=0
is_bestseller : tinyint(1) : default=0
is_sale : tinyint(1) : default=0
imgs : longtext : default=[]
units : int(11)
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null
```

### Categories
```
id : int(11) : primary_key : auto_increment
name : varchar(45)
is_popular : tinyint(1)
imgs : longtext : default=[]
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null
```

### Goals
```
id : int(11) : primary_key : auto_increment
name : varchar(45)
imgs : longtext : default=[]
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null
```

### Users
```
id : int(11) : primary_key : auto_increment
username : varchar(255)
email : varchar(255)
password : varchar(255)
firstname : varchar(100)
lastname : varchar(100)
adress_1 : varchar(100)
adress_2 : varchar(100)
postal_code : int(100)
city : varchar(100)
is_admin : tinyint(1) : default=null
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null
```

### Orders
```
id : int(11) : primary_key : auto_increment
user_id : int(11)
product_id : int(11)
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null
```

### Merchants
```
id : int(11) : primary_key : auto_increment
name : int(11)
website : varchar(45)
created_at : timestamp : current_timestamp()
updated_at : timestamp : current_timestamp : on_update_current_timestamp()
deleted_at : timestamp : null = true : default = null

