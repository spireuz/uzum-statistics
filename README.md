# Uzum Trends API
> This project aims to give an example of integrating applications into Uzum API. This is not an official API, so it is not recommended for production usage.
> NOTICE: Some of the APIs or variables could have been changed in Uzum API. Please, check out uzum.uz

## REST API Integration

### Base URL
```https://api.umarket.uz/api```

### Headers
<pre>
- Authorization: Bearer <b>AUTH_TOKEN</b>
- Accept-Language: uz-UZ
- Accept: application/json
</pre>

### Endpoints
<pre>
<b>GET</b> /main/city
<b>GET</b> /main/cities
<b>GET</b> /v2/delivery/min-free-price?cityId=
<b>GET</b> /main/delivery?cityId=
<b>GET</b> /main/root-categories
<b>GET</b> /shop/{shopName}
<b>GET</b> /v2/product/{productId}
<b>GET</b> /product/{productId}/reviews
<b>GET</b> /v2/product/{productId}/similar
</pre>

## GraphQL Integration

### Base URL
```https://graphql.umarket.uz```

### Headers
<pre>
- Authorization: Bearer <b>AUTH_TOKEN</b>
- X-Iid: <b>X_IID</b>
- Accept-Language: uz-UZ
- Accept: application/json
</pre>

### Endpoints
<pre>
<b>POST</b> /
</pre>
Checkout the [Code](https://github.com/spireuz/uzum-statistics/blob/main/app/Integrations/GraphqlClient.php#L73) to see query example for Product Search

## Variables used in the doc
>You need to update these periodically by opening uzum.uz website and checking the response headers in the Network tab

<pre>
<b>AUTH_TOKEN</b>=eyJraWQiOiIwcE9oTDBBVXlWSXF1V0w1U29NZTdzcVNhS2FqYzYzV1N5THZYb0ZhWXRNIiwiYWxnIjoiRWREU0EiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJVenVtIElEIiwiaWF0IjoxNzA5MTQyMjI5LCJzdWIiOiJjYmMyZTcyYi0zM2MyLTQ5NzQtODBhNS1kZGE1YTA2YzBhOTQiLCJhdWQiOlsidXp1bV9hcHBzIiwibWFya2V0L3dlYiJdLCJldmVudHMiOnt9LCJleHAiOjE3MDkxNDI5NDl9.ozeWufT9AZkJwKph2DotkwooT8YzDSPKdEtYBxpOSqTnzxFanGv1-6eNjph49XRq9v04MH8s5VsRqI71KeYrDA
<b>X_IID</b>=7c56d8ee-6c57-4d14-9c81-c89fd734698a
</pre>
