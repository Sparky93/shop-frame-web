# ----------------------------------[~/api/v1/]---------------------------------


# Name: 
    LOGIN
   
# Method: 
    POST

# Body:

 - scope = scope_login
  
 - gmail = <...>@gmail.com
 
# Example responses:

**`SUCCESS`**

```json
{
  "success": 2,
  "message": "Username Successfully Logged In !",
  "id": "5",
  "tools": [
    {
      "id": "1",
      "gmail": "asd5@gmail.com",
      "created_date": "2016-12-10 15:28:17",
      "updated_date": "2016-12-10 20:37:45",
      "unlocked": "1",
      "units": "0"
    }
  ]
}
```


# ------------------------------------------------------------------------------- 


# Name: 
    BUY
   
# Method:
    POST
   
# Body

 - scope = scope_buy

 - gmail = <...>@gmail.com

 - tool_id = <#> 
 
# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "You have successfully unlocked this item!"
}
```


# ------------------------------------------------------------------------------- 


# Name: 
    POINTS
   
# Method: 
    POST
    
# Body

 - scope = scope_points

 - gmail = <...>@gmail.com

 - tool_id = <#>

# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "You have successfully used these points!",
  "units": "0"
}
```
 
 **`ERROR`**
 
 ```json
{
  "success": 0,
  "message": "You don't have enough points !"
}
```

 
# ------------------------------------------------------------------------------- 
 
 
# Name: 
    INFO
   
# Method: 
    POST
    
# Body

 - scope = scope_info

# Example responses:

**`SUCCESS`**

```json
{
  "success": 1,
  "message": "Successfully fetched data!",
  "tools": [
    {
      "tool_id": "1",
      "name": "tool_one",
      "available": "1",
      "updated_on": "2016-12-10 20:38:08",
      "index": "1200",
      "daily_units": "50"
    },
    {
      "tool_id": "2",
      "name": "Tool unavailable yet.",
      "available": "0",
      "updated_on": "0000-00-00 00:00:00",
      "index": "0",
      "daily_units": "0"
    },
    {
      "tool_id": "3",
      "name": "Tool unavailable yet.",
      "available": "0",
      "updated_on": "0000-00-00 00:00:00",
      "index": "0",
      "daily_units": "0"
    },
    {
      "tool_id": "4",
      "name": "Tool unavailable yet.",
      "available": "0",
      "updated_on": "0000-00-00 00:00:00",
      "index": "0",
      "daily_units": "0"
    },
    {
      "tool_id": "5",
      "name": "Tool unavailable yet.",
      "available": "0",
      "updated_on": "0000-00-00 00:00:00",
      "index": "0",
      "daily_units": "0"
    }
  ]
}
```
