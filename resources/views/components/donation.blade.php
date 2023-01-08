<div class="details">
    <div class="blood-type">
        <h2 dir="ltr">{{ $donation->bloodType->name }}</h2>
    </div>
    <ul>
        <li><span>اسم الحالة:</span> {{ $donation->name }}</li>
        <li><span>مستشفى:</span> {{ $donation->hospital_name }}</li>
        <li><span>المدينة:</span> {{ $donation->city->name }}</li>
    </ul>
    <a href="{{ route('donationRequests.show' , $donation->id) }}">التفاصيل</a>
</div>