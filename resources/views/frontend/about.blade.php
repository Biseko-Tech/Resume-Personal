<div class="about" id="about">
    <div class="content-inner">
        <div class="content-header">
            <h2>About Me</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-5">
                <img src="{{ asset($about->photo) }}" alt="Image">
            </div>
            <div class="col-md-6 col-lg-7">
                <p>{{ $about->description }}</p>
                <a class="btn" href="#contact">Hire Me</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="skills">
                    <div class="skill-name">
                        <p>HTML</p><p>85%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="skill-name">
                        <p>CSS</p><p>95%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="skill-name">
                        <p>jQuery</p><p>80%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skills">
                    <div class="skill-name">
                        <p>Laravel</p><p>90%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="skill-name">
                        <p>PHP</p><p>85%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="skill-name">
                        <p>MySQL</p><p>95%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>