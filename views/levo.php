<div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Kategorije</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	<li class="first"><a href="index.php?page=apple">Apple</a></li>
                        <li><a href="index.php?page=samsung">Samsung</a></li>
                        <li><a href="index.php?page=huawei">Huawei</a></li>
                        <li><a href="index.php?page=xiaomi">Xiaomi</a></li>
                        <li class="last"><a href="index.php?page=proizvodi">Svi Proizvodi</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Anketa</h3>   
                <div class="content"> 
                	<div id="poll">
							<?php if(!isset($_COOKIE['adresa'])):;?>
							<h4 style="color:#d6d3d3;">Omiljeni brend?</h4>
							<table>
							<tr>
							<td>Apple:</td>
							<td><input type="radio" name="vote" value="0" onclick="getVote(this.value)"></td></tr>
							<tr>
							<td>Samsung:</td>
							<td><input type="radio" name="vote" value="1" onclick="getVote(this.value)"></td></tr>
							<tr>
							<td>Huawei:</td>
							<td><input type="radio" name="vote" value="2" onclick="getVote(this.value)"></td></tr>
							<tr>
							<td>Xiaomi:</td>
							<td><input type="radio" name="vote" value="3" onclick="getVote(this.value)"></td></tr>
							<tr>
							<td>Alcatel:</td>
							<td><input type="radio" name="vote" value="4" onclick="getVote(this.value)"></td></tr>
							<tr>
							<td>Lenovo:</td>
							<td><input type="radio" name="vote" value="5" onclick="getVote(this.value)"></td>
							</tr>
							</table>
							<?php else: include "poll_vote.php";?>
							<?php endif;?>
					</div>
                </div>
            </div>
        </div>