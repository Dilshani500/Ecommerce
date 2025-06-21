<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use Filament\Forms\Components\NumberInput;


class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $avgPrice = Order::query()->avg('grand_total');
        $formattedPrice = '₹' . number_format($avgPrice, 2);
        return [

            

            Stat::make('New Orders',Order::query()->where('status','new')->count()),
            Stat::make('Order Processing',Order::Query()->where('status','processing')->count()),
            Stat::make('Order Shipped',Order::Query()->where('status','Shipped')->count()),
            Stat::make('Average Price',$formattedPrice)



        ];
    }

    
}
