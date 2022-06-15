<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

	public function installments()
	{
		return $this->hasMany(Installment::class);
	}    

	public function bank()
	{
		return $this->belongsTo(Bank::class);
	}

	public function productPrices()
	{
		return $this->hasMany(ProductPrice::class);
	}

	public function workshopDates()
	{
		return $this->hasMany(WorkshopDate::class);
	}

	public function productAffiliateCommissions()
	{
		return $this->hasMany(ProductAffiliateCommission::class);
	}

	public function productAgentCommissions()
	{
		return $this->hasMany(ProductAgentCommission::class);
	}

	public function productAgents()
	{
		return $this->hasMany(ProductAgent::class);
	}

	public function affiliateTools()
	{
		return $this->hasMany(AffiliateTool::class);
	}

	public function orderDetails()
	{
		return $this->hasMany(OrderDetail::class);
	}

	public function affiliateCommissions()
	{
		return $this->hasMany(AffiliateCommission::class);
	}

	public function waPromotions()
	{
		return $this->hasMany(WaPromotion::class);
	}

	public function scopeWithAllRelations($query)
	{
		return $query->with(['bank', 'productPrices', 'workshopDates', 'productAffiliateCommissions', 'productAgentCommissions', 'productAgents', 'orderDetails', 'affiliateCommissions', 'waPromotions']);
	}

    public function stock()
	{
		return $this->hasOne(Stock::class);
	}
}
