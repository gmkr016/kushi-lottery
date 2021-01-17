<!-- @dump($lcat) -->
<div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="check-box">
                            <h4 class="title">1. Select a Game</h4>
                            <div class="form-area">
                                <select>
                                @foreach($lcat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="check-box">
                            <h4 class="title">2. Pick a Date</h4>
                            <div class="form-area">
                                <input type="date">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="check-box">
                            <h4 class="title">3. Enter Your Number</h4>
                            <div class="form-area input-round-wrapper">
                                <input type="text" class="input-round">
                                <input type="text" class="input-round">
                                <input type="text" class="input-round">
                                <input type="text" class="input-round">
                                <input type="text" class="input-round">
                                <input type="text" class="input-round">
                            </div>
                        </div>
                    </div>
                </div>
