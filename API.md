# Kraken API
At https://www.kraken.com/help/api

## `QueryPublic()`
- `Time`
- `Assets`
- `AssetPairs`
- `Ticker` (needs params: `pair`)
    - Today's prices start at 00:00:00 UTC
- `OHLC` (needs params: `pair`)
    - Open-high-low-close chart: http://en.wikipedia.org/wiki/Open-high-low-close_chart
- `Depth` (needs params: `pair`)
    - Order book
- `Trades` (needs params: `pair`)
- `Spread` (needs params: `pair`)

## `QueryPrivate()`
- `Balance`